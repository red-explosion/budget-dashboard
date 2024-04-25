<?php

declare(strict_types=1);

namespace App\Support;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Support\Collection;

class BudgetOverview
{
    private Collection $overview;

    public function __construct()
    {
        $this->overview = new Collection();
    }

    public static function make(): Collection
    {
        $overview = new self();

        return $overview
            ->addIncome()
            ->addExpenses()
            ->addSummary()
            ->get();
    }

    public function get(): Collection
    {
        return $this->overview;
    }

    public function addIncome(): self
    {
        $this->addItem('Income', heading: true);

        $income = Income::get();

        $income->map(function (Income $income) {
            $this->addItem($income->name, $income->amount);
        });

        $this->addItem('Total', $income->sum('amount'), summary: true);

        return $this;
    }

    public function addExpenses(): self
    {
        $categories = Category::get();
        $expenses = Expense::get();

        $categories->each(function (Category $category) use ($expenses) {
            $categoryExpenses = $expenses->where('category_id', $category->id);

            if ($categoryExpenses->isEmpty()) {
                return;
            }

            $this->addItem($category->name, heading: true);

            $categoryExpenses->each(function (Expense $expense) {
                $this->addItem($expense->name, $expense->amount);
            });

            $this->addItem('Total', $categoryExpenses->sum('amount'), summary: true);
        });

        if ($expenses->whereNull('category_id')->isNotEmpty()) {
            $this->addItem('Other expenses', heading: true);

            $expensesWithoutCategory = $expenses->whereNull('category_id');

            $expensesWithoutCategory->each(function (Expense $expense) {
                $this->addItem($expense->name, $expense->amount);
            });

            $this->addItem('Total', $expensesWithoutCategory->sum('amount'), summary: true);
        }

        return $this;
    }

    public function addSummary(): self
    {
        $totalIncome = Income::sum('amount') / 100;
        $totalExpenses = Expense::sum('amount') / 100;

        $this->addItem('Total monthly expenditure', $totalExpenses, summary: true);
        $this->addItem('Remaining balance', $totalIncome - $totalExpenses, summary: true);

        return $this;
    }

    private function addItem(string $name, ?float $amount = null, bool $heading = false, bool $summary = false): void
    {
        $this->overview->push([
            'name' => $name,
            'amount' => $amount,
            'heading' => $heading,
            'summary' => $summary,
        ]);
    }
}
