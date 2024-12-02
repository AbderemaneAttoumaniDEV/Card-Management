<?php

namespace Abderemane\Poo;

class ListCards
{
    private array $listCards = [];

    public function addCard(Card $card): void
    {
        $this->listCards[] = $card;
    }

    public function printCardsInfo(): void
    {
        foreach ($this->listCards as $index => $card) {
            echo "Infos sur la carte " . ($index + 1) . " :\n";
            echo "Question: " . $card->getQuestion() . "\n";
            echo "Réponse: " . $card->getAnswer() . "\n";
        }
    }
}
