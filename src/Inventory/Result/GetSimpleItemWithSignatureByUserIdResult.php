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

class GetSimpleItemWithSignatureByUserIdResult implements IResult {
    /** @var SimpleItem */
    private $item;
    /** @var SimpleItemModel */
    private $simpleItemModel;
    /** @var string */
    private $body;
    /** @var string */
    private $signature;

	public function getItem(): ?SimpleItem {
		return $this->item;
	}

	public function setItem(?SimpleItem $item) {
		$this->item = $item;
	}

	public function withItem(?SimpleItem $item): GetSimpleItemWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getSimpleItemModel(): ?SimpleItemModel {
		return $this->simpleItemModel;
	}

	public function setSimpleItemModel(?SimpleItemModel $simpleItemModel) {
		$this->simpleItemModel = $simpleItemModel;
	}

	public function withSimpleItemModel(?SimpleItemModel $simpleItemModel): GetSimpleItemWithSignatureByUserIdResult {
		$this->simpleItemModel = $simpleItemModel;
		return $this;
	}

	public function getBody(): ?string {
		return $this->body;
	}

	public function setBody(?string $body) {
		$this->body = $body;
	}

	public function withBody(?string $body): GetSimpleItemWithSignatureByUserIdResult {
		$this->body = $body;
		return $this;
	}

	public function getSignature(): ?string {
		return $this->signature;
	}

	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

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