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


class LotteryModelMaster implements IModel {
	/**
     * @var string
	 */
	private $lotteryModelId;
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
     * @var string
	 */
	private $mode;
	/**
     * @var string
	 */
	private $method;
	/**
     * @var string
	 */
	private $prizeTableName;
	/**
     * @var string
	 */
	private $choicePrizeTableScriptId;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getLotteryModelId(): ?string {
		return $this->lotteryModelId;
	}

	public function setLotteryModelId(?string $lotteryModelId) {
		$this->lotteryModelId = $lotteryModelId;
	}

	public function withLotteryModelId(?string $lotteryModelId): LotteryModelMaster {
		$this->lotteryModelId = $lotteryModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): LotteryModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): LotteryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): LotteryModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getMode(): ?string {
		return $this->mode;
	}

	public function setMode(?string $mode) {
		$this->mode = $mode;
	}

	public function withMode(?string $mode): LotteryModelMaster {
		$this->mode = $mode;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): LotteryModelMaster {
		$this->method = $method;
		return $this;
	}

	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}

	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	public function withPrizeTableName(?string $prizeTableName): LotteryModelMaster {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}

	public function getChoicePrizeTableScriptId(): ?string {
		return $this->choicePrizeTableScriptId;
	}

	public function setChoicePrizeTableScriptId(?string $choicePrizeTableScriptId) {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
	}

	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): LotteryModelMaster {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): LotteryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): LotteryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?LotteryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new LotteryModelMaster())
            ->withLotteryModelId(empty($data['lotteryModelId']) ? null : $data['lotteryModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMode(empty($data['mode']) ? null : $data['mode'])
            ->withMethod(empty($data['method']) ? null : $data['method'])
            ->withPrizeTableName(empty($data['prizeTableName']) ? null : $data['prizeTableName'])
            ->withChoicePrizeTableScriptId(empty($data['choicePrizeTableScriptId']) ? null : $data['choicePrizeTableScriptId'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
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
        );
    }
}