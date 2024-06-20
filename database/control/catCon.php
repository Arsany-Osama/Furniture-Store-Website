<?php
  interface CategoryController{

    public function getProducCategorytId() : int;

    public function getName(): string;

    public function getCreated_at() : string;

    public function getModified_at() : string;

    public function setName(string $name);

    public function setModified_at(string $newModification);
  }
  ?>