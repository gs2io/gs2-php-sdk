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

/**
 * Request for updateLotteryModelMaster: Update Lottery Model Master
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#updatelotterymodelmaster
 */
class UpdateLotteryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Lottery Model name */
    private $lotteryName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Drawing Mode */
    private $mode;
    /** @var string Prize Table Selection Method */
    private $method;
    /** @var string Prize Table Name */
    private $prizeTableName;
    /** @var string GS2-Script script GRN to determine the Prize Table */
    private $choicePrizeTableScriptId;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateLotteryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateLotteryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Lottery Model name */
	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}
    /** @param string|null $lotteryName Lottery Model name */
	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}
    /**
     * @param string|null $lotteryName Lottery Model name
     * @return UpdateLotteryModelMasterRequest
     */
	public function withLotteryName(?string $lotteryName): UpdateLotteryModelMasterRequest {
		$this->lotteryName = $lotteryName;
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
     * @return UpdateLotteryModelMasterRequest
     */
	public function withDescription(?string $description): UpdateLotteryModelMasterRequest {
		$this->description = $description;
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
     * @return UpdateLotteryModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateLotteryModelMasterRequest {
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
     * @return UpdateLotteryModelMasterRequest
     */
	public function withMode(?string $mode): UpdateLotteryModelMasterRequest {
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
     * @return UpdateLotteryModelMasterRequest
     */
	public function withMethod(?string $method): UpdateLotteryModelMasterRequest {
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
     * @return UpdateLotteryModelMasterRequest
     */
	public function withPrizeTableName(?string $prizeTableName): UpdateLotteryModelMasterRequest {
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
     * @return UpdateLotteryModelMasterRequest
     */
	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): UpdateLotteryModelMasterRequest {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateLotteryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateLotteryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLotteryName(array_key_exists('lotteryName', $data) && $data['lotteryName'] !== null ? $data['lotteryName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMode(array_key_exists('mode', $data) && $data['mode'] !== null ? $data['mode'] : null)
            ->withMethod(array_key_exists('method', $data) && $data['method'] !== null ? $data['method'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withChoicePrizeTableScriptId(array_key_exists('choicePrizeTableScriptId', $data) && $data['choicePrizeTableScriptId'] !== null ? $data['choicePrizeTableScriptId'] : null);
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