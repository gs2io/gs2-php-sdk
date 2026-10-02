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
 * Lottery Model Master
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#lotterymodelmaster
 */
class LotteryModelMaster implements IModel {
	/**
     * @var string Lottery Model Master GRN
	 */
	private $lotteryModelId;
	/**
     * @var string Lottery Model name
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
     * @var string Drawing Mode
	 */
	private $mode;
	/**
     * @var string Prize Table Selection Method
	 */
	private $method;
	/**
     * @var string Prize Table Name
	 */
	private $prizeTableName;
	/**
     * @var string GS2-Script script GRN to determine the Prize Table
	 */
	private $choicePrizeTableScriptId;
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
    /** @return string|null Lottery Model Master GRN */
	public function getLotteryModelId(): ?string {
		return $this->lotteryModelId;
	}
    /** @param string|null $lotteryModelId Lottery Model Master GRN */
	public function setLotteryModelId(?string $lotteryModelId) {
		$this->lotteryModelId = $lotteryModelId;
	}
    /**
     * @param string|null $lotteryModelId Lottery Model Master GRN
     * @return LotteryModelMaster
     */
	public function withLotteryModelId(?string $lotteryModelId): LotteryModelMaster {
		$this->lotteryModelId = $lotteryModelId;
		return $this;
	}
    /** @return string|null Lottery Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Lottery Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Lottery Model name
     * @return LotteryModelMaster
     */
	public function withName(?string $name): LotteryModelMaster {
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
     * @return LotteryModelMaster
     */
	public function withMetadata(?string $metadata): LotteryModelMaster {
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
     * @return LotteryModelMaster
     */
	public function withDescription(?string $description): LotteryModelMaster {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Drawing Mode */
	public function getMode(): ?string {
		return $this->mode;
	}
    /** @param string|null $mode Drawing Mode */
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
    /**
     * @param string|null $mode Drawing Mode
     * @return LotteryModelMaster
     */
	public function withMode(?string $mode): LotteryModelMaster {
		$this->mode = $mode;
		return $this;
	}
    /** @return string|null Prize Table Selection Method */
	public function getMethod(): ?string {
		return $this->method;
	}
    /** @param string|null $method Prize Table Selection Method */
	public function setMethod(?string $method) {
		$this->method = $method;
	}
    /**
     * @param string|null $method Prize Table Selection Method
     * @return LotteryModelMaster
     */
	public function withMethod(?string $method): LotteryModelMaster {
		$this->method = $method;
		return $this;
	}
    /** @return string|null Prize Table Name */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
    /** @param string|null $prizeTableName Prize Table Name */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
    /**
     * @param string|null $prizeTableName Prize Table Name
     * @return LotteryModelMaster
     */
	public function withPrizeTableName(?string $prizeTableName): LotteryModelMaster {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
    /** @return string|null GS2-Script script GRN to determine the Prize Table */
	public function getChoicePrizeTableScriptId(): ?string {
		return $this->choicePrizeTableScriptId;
	}
    /** @param string|null $choicePrizeTableScriptId GS2-Script script GRN to determine the Prize Table */
	public function setChoicePrizeTableScriptId(?string $choicePrizeTableScriptId) {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
	}
    /**
     * @param string|null $choicePrizeTableScriptId GS2-Script script GRN to determine the Prize Table
     * @return LotteryModelMaster
     */
	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): LotteryModelMaster {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
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
     * @return LotteryModelMaster
     */
	public function withCreatedAt(?int $createdAt): LotteryModelMaster {
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
     * @return LotteryModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): LotteryModelMaster {
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
     * @return LotteryModelMaster
     */
	public function withRevision(?int $revision): LotteryModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?LotteryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new LotteryModelMaster())
            ->withLotteryModelId(array_key_exists('lotteryModelId', $data) && $data['lotteryModelId'] !== null ? $data['lotteryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withChoicePrizeTableScriptId(array_key_exists('choicePrizeTableScriptId', $data) && $data['choicePrizeTableScriptId'] !== null ? $data['choicePrizeTableScriptId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "lotteryModelId" => $this->getLotteryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "mode" => $this->getMode(),
            "method" => $this->getMethod(),
            "prizeTableName" => $this->getPrizeTableName(),
            "choicePrizeTableScriptId" => $this->getChoicePrizeTableScriptId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}