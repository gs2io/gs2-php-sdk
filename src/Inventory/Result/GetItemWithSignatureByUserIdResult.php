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
use Gs2\Inventory\Model\ItemSet;
use Gs2\Inventory\Model\ItemModel;
use Gs2\Inventory\Model\Inventory;

/**
 * Result of getItemWithSignatureByUserId: Get Item Set with signature by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getitemwithsignaturebyuserid
 */
class GetItemWithSignatureByUserIdResult implements IResult {
    /** @var array List of Item Sets */
    private $items;
    /** @var ItemModel Item Model */
    private $itemModel;
    /** @var Inventory Inventory */
    private $inventory;
    /** @var string Item Set Information for Signature Subject */
    private $body;
    /** @var string Signature */
    private $signature;

    /** @return array|null List of Item Sets */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Item Sets */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Item Sets
     * @return GetItemWithSignatureByUserIdResult
     */
	public function withItems(?array $items): GetItemWithSignatureByUserIdResult {
		$this->items = $items;
		return $this;
	}

    /** @return ItemModel|null Item Model */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

    /** @param ItemModel|null $itemModel Item Model */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

    /**
     * @param ItemModel|null $itemModel Item Model
     * @return GetItemWithSignatureByUserIdResult
     */
	public function withItemModel(?ItemModel $itemModel): GetItemWithSignatureByUserIdResult {
		$this->itemModel = $itemModel;
		return $this;
	}

    /** @return Inventory|null Inventory */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

    /** @param Inventory|null $inventory Inventory */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

    /**
     * @param Inventory|null $inventory Inventory
     * @return GetItemWithSignatureByUserIdResult
     */
	public function withInventory(?Inventory $inventory): GetItemWithSignatureByUserIdResult {
		$this->inventory = $inventory;
		return $this;
	}

    /** @return string|null Item Set Information for Signature Subject */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Item Set Information for Signature Subject */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Item Set Information for Signature Subject
     * @return GetItemWithSignatureByUserIdResult
     */
	public function withBody(?string $body): GetItemWithSignatureByUserIdResult {
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
     * @return GetItemWithSignatureByUserIdResult
     */
	public function withSignature(?string $signature): GetItemWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    public static function fromJson(?array $data): ?GetItemWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetItemWithSignatureByUserIdResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return ItemSet::fromJson($item);
                },
                $data['items']
            ))
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
            "inventory" => $this->getInventory() !== null ? $this->getInventory()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
        );
    }
}