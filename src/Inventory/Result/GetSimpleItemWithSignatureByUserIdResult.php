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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\SimpleItem;
use Gs2\Inventory\Model\SimpleItemModel;

/**
 * Result of getSimpleItemWithSignatureByUserId: Get a Simple Item with signature by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getsimpleitemwithsignaturebyuserid
 */
class GetSimpleItemWithSignatureByUserIdResult implements IResult {
    /** @var SimpleItem Simple Item */
    private $item;
    /** @var SimpleItemModel Simple Item Model */
    private $simpleItemModel;
    /** @var string Simple Item Information for Signature Subject */
    private $body;
    /** @var string Signature */
    private $signature;

    /** @return SimpleItem|null Simple Item */
	public function getItem(): ?SimpleItem {
		return $this->item;
	}

    /** @param SimpleItem|null $item Simple Item */
	public function setItem(?SimpleItem $item) {
		$this->item = $item;
	}

    /**
     * @param SimpleItem|null $item Simple Item
     * @return GetSimpleItemWithSignatureByUserIdResult
     */
	public function withItem(?SimpleItem $item): GetSimpleItemWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return SimpleItemModel|null Simple Item Model */
	public function getSimpleItemModel(): ?SimpleItemModel {
		return $this->simpleItemModel;
	}

    /** @param SimpleItemModel|null $simpleItemModel Simple Item Model */
	public function setSimpleItemModel(?SimpleItemModel $simpleItemModel) {
		$this->simpleItemModel = $simpleItemModel;
	}

    /**
     * @param SimpleItemModel|null $simpleItemModel Simple Item Model
     * @return GetSimpleItemWithSignatureByUserIdResult
     */
	public function withSimpleItemModel(?SimpleItemModel $simpleItemModel): GetSimpleItemWithSignatureByUserIdResult {
		$this->simpleItemModel = $simpleItemModel;
		return $this;
	}

    /** @return string|null Simple Item Information for Signature Subject */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Simple Item Information for Signature Subject */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Simple Item Information for Signature Subject
     * @return GetSimpleItemWithSignatureByUserIdResult
     */
	public function withBody(?string $body): GetSimpleItemWithSignatureByUserIdResult {
		$this->body = $body;
		return $this;
	}

    /** @return string|null Signature */
	public function getSignature(): ?string {
		return $this->signature;
	}

    /** @param string|null $signature Signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    /**
     * @param string|null $signature Signature
     * @return GetSimpleItemWithSignatureByUserIdResult
     */
	public function withSignature(?string $signature): GetSimpleItemWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSimpleItemWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetSimpleItemWithSignatureByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SimpleItem::fromJson($data['item']) : null)
            ->withSimpleItemModel(array_key_exists('simpleItemModel', $data) && $data['simpleItemModel'] !== null ? SimpleItemModel::fromJson($data['simpleItemModel']) : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "simpleItemModel" => $this->getSimpleItemModel() !== null ? $this->getSimpleItemModel()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}