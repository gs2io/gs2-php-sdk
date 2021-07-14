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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateLotteryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $lotteryName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $mode;
    /** @var string */
    private $method;
    /** @var string */
    private $prizeTableName;
    /** @var string */
    private $choicePrizeTableScriptId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateLotteryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}

	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}

	public function withLotteryName(?string $lotteryName): UpdateLotteryModelMasterRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateLotteryModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateLotteryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getMode(): ?string {
		return $this->mode;
	}

	public function setMode(?string $mode) {
		$this->mode = $mode;
	}

	public function withMode(?string $mode): UpdateLotteryModelMasterRequest {
		$this->mode = $mode;
		return $this;
	}

	public function getMethod(): ?string {
		return $this->method;
	}

	public function setMethod(?string $method) {
		$this->method = $method;
	}

	public function withMethod(?string $method): UpdateLotteryModelMasterRequest {
		$this->method = $method;
		return $this;
	}

	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}

	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	public function withPrizeTableName(?string $prizeTableName): UpdateLotteryModelMasterRequest {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}

	public function getChoicePrizeTableScriptId(): ?string {
		return $this->choicePrizeTableScriptId;
	}

	public function setChoicePrizeTableScriptId(?string $choicePrizeTableScriptId) {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
	}

	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): UpdateLotteryModelMasterRequest {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateLotteryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateLotteryModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withLotteryName(empty($data['lotteryName']) ? null : $data['lotteryName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withMode(empty($data['mode']) ? null : $data['mode'])
            ->withMethod(empty($data['method']) ? null : $data['method'])
            ->withPrizeTableName(empty($data['prizeTableName']) ? null : $data['prizeTableName'])
            ->withChoicePrizeTableScriptId(empty($data['choicePrizeTableScriptId']) ? null : $data['choicePrizeTableScriptId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "mode" => $this->getMode(),
            "method" => $this->getMethod(),
            "prizeTableName" => $this->getPrizeTableName(),
            "choicePrizeTableScriptId" => $this->getChoicePrizeTableScriptId(),
        );
    }
}