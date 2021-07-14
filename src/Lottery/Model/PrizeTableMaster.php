<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;


class PrizeTableMaster implements IModel {
	/**
     * @var string
	 */
	private $prizeTableId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var array
	 */
	private $prizes;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getPrizeTableId(): ?string {
		return $this->prizeTableId;
	}

	public function setPrizeTableId(?string $prizeTableId) {
		$this->prizeTableId = $prizeTableId;
	}

	public function withPrizeTableId(?string $prizeTableId): PrizeTableMaster {
		$this->prizeTableId = $prizeTableId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): PrizeTableMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): PrizeTableMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): PrizeTableMaster {
		$this->description = $description;
		return $this;
	}

	public function getPrizes(): ?array {
		return $this->prizes;
	}

	public function setPrizes(?array $prizes) {
		$this->prizes = $prizes;
	}

	public function withPrizes(?array $prizes): PrizeTableMaster {
		$this->prizes = $prizes;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): PrizeTableMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): PrizeTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?PrizeTableMaster {
        if ($data === null) {
            return null;
        }
        return (new PrizeTableMaster())
            ->withPrizeTableId(empty($data['prizeTableId']) ? null : $data['prizeTableId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withPrizes(array_map(
                function ($item) {
                    return Prize::fromJson($item);
                },
                array_key_exists('prizes', $data) && $data['prizes'] !== null ? $data['prizes'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "prizeTableId" => $this->getPrizeTableId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "prizes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getPrizes() !== null && $this->getPrizes() !== null ? $this->getPrizes() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}