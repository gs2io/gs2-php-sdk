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
 * Lottery Model
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#lotterymodel
 */
class LotteryModel implements IModel {
	/**
     * @var string Lottery Model GRN
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
    /** @return string|null Lottery Model GRN */
	public function getLotteryModelId(): ?string {
		return $this->lotteryModelId;
	}
    /** @param string|null $lotteryModelId Lottery Model GRN */
	public function setLotteryModelId(?string $lotteryModelId) {
		$this->lotteryModelId = $lotteryModelId;
	}
    /**
     * @param string|null $lotteryModelId Lottery Model GRN
     * @return LotteryModel
     */
	public function withLotteryModelId(?string $lotteryModelId): LotteryModel {
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
     * @return LotteryModel
     */
	public function withName(?string $name): LotteryModel {
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
     * @return LotteryModel
     */
	public function withMetadata(?string $metadata): LotteryModel {
		$this->metadata = $metadata;
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
     * @return LotteryModel
     */
	public function withMode(?string $mode): LotteryModel {
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
     * @return LotteryModel
     */
	public function withMethod(?string $method): LotteryModel {
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
     * @return LotteryModel
     */
	public function withPrizeTableName(?string $prizeTableName): LotteryModel {
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
     * @return LotteryModel
     */
	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): LotteryModel {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
		return $this;
	}

    public static function fromJson(?array $data): ?LotteryModel {
        if ($data === null) {
            return null;
        }
        return (new LotteryModel())
            ->withLotteryModelId(array_key_exists('lotteryModelId', $data) && $data['lotteryModelId'] !== null ? $data['lotteryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withChoicePrizeTableScriptId(array_key_exists('choicePrizeTableScriptId', $data) && $data['choicePrizeTableScriptId'] !== null ? $data['choicePrizeTableScriptId'] : null);
    }

    public function toJson(): array {
        return array(
            "lotteryModelId" => $this->getLotteryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "mode" => $this->getMode(),
            "method" => $this->getMethod(),
            "prizeTableName" => $this->getPrizeTableName(),
            "choicePrizeTableScriptId" => $this->getChoicePrizeTableScriptId(),
        );
    }
}