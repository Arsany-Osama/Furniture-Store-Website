<?php
  interface InventoryController{
    public function getProducInventorytId() : int;

    public function getQuantity(): string;

    public function getCreated_at() : string;

    public function getModified_at() : string;

    public function setQuantity(string $name);

    public function setModified_at(string $newModification);

  }
  ?>