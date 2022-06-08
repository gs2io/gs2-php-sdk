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


class LotteryModel implements IModel {
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
	public function getLotteryModelId(): ?string {
		return $this->lotteryModelId;
	}
	public function setLotteryModelId(?string $lotteryModelId) {
		$this->lotteryModelId = $lotteryModelId;
	}
	public function withLotteryModelId(?string $lotteryModelId): LotteryModel {
		$this->lotteryModelId = $lotteryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): LotteryModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): LotteryModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMode(): ?string {
		return $this->mode;
	}
	public function setMode(?string $mode) {
		$this->mode = $mode;
	}
	public function withMode(?string $mode): LotteryModel {
		$this->mode = $mode;
		return $this;
	}
	public function getMethod(): ?string {
		return $this->method;
	}
	public function setMethod(?string $method) {
		$this->method = $method;
	}
	public function withMethod(?string $method): LotteryModel {
		$this->method = $method;
		return $this;
	}
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
	public function withPrizeTableName(?string $prizeTableName): LotteryModel {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	public function getChoicePrizeTableScriptId(): ?string {
		return $this->choicePrizeTableScriptId;
	}
	public function setChoicePrizeTableScriptId(?string $choicePrizeTableScriptId) {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
	}
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