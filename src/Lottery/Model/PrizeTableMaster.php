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


/**
 * Prize Table Master
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#prizetablemaster
 */
class PrizeTableMaster implements IModel {
	/**
     * @var string Prize Table Master GRN
	 */
	private $prizeTableId;
	/**
     * @var string Prize Table Name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var array Prizes
	 */
	private $prizes;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Prize Table Master GRN */
	public function getPrizeTableId(): ?string {
		return $this->prizeTableId;
	}
    /** @param string|null $prizeTableId Prize Table Master GRN */
	public function setPrizeTableId(?string $prizeTableId) {
		$this->prizeTableId = $prizeTableId;
	}
    /**
     * @param string|null $prizeTableId Prize Table Master GRN
     * @return PrizeTableMaster
     */
	public function withPrizeTableId(?string $prizeTableId): PrizeTableMaster {
		$this->prizeTableId = $prizeTableId;
		return $this;
	}
    /** @return string|null Prize Table Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Prize Table Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Prize Table Name
     * @return PrizeTableMaster
     */
	public function withName(?string $name): PrizeTableMaster {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return PrizeTableMaster
     */
	public function withMetadata(?string $metadata): PrizeTableMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return PrizeTableMaster
     */
	public function withDescription(?string $description): PrizeTableMaster {
		$this->description = $description;
		return $this;
	}
    /** @return array|null Prizes */
	public function getPrizes(): ?array {
		return $this->prizes;
	}
    /** @param array|null $prizes Prizes */
	public function setPrizes(?array $prizes) {
		$this->prizes = $prizes;
	}
    /**
     * @param array|null $prizes Prizes
     * @return PrizeTableMaster
     */
	public function withPrizes(?array $prizes): PrizeTableMaster {
		$this->prizes = $prizes;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return PrizeTableMaster
     */
	public function withCreatedAt(?int $createdAt): PrizeTableMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return PrizeTableMaster
     */
	public function withUpdatedAt(?int $updatedAt): PrizeTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return PrizeTableMaster
     */
	public function withRevision(?int $revision): PrizeTableMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?PrizeTableMaster {
        if ($data === null) {
            return null;
        }
        return (new PrizeTableMaster())
            ->withPrizeTableId(array_key_exists('prizeTableId', $data) && $data['prizeTableId'] !== null ? $data['prizeTableId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPrizes(!array_key_exists('prizes', $data) || $data['prizes'] === null ? null : array_map(
                function ($item) {
                    return Prize::fromJson($item);
                },
                $data['prizes']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "prizeTableId" => $this->getPrizeTableId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "prizes" => $this->getPrizes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getPrizes()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}