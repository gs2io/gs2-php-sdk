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

namespace Gs2\Lottery\Result;

use Gs2\Core\Model\IResult;
use Gs2\Lottery\Model\AcquireAction;
use Gs2\Lottery\Model\DrawnPrize;
use Gs2\Lottery\Model\BoxItem;
use Gs2\Lottery\Model\BoxItems;

class DrawByUserIdResult implements IResult {
    /** @var array */
    private $items;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;
    /** @var BoxItems */
    private $boxItems;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): DrawByUserIdResult {
		$this->items = $items;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): DrawByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): DrawByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getBoxItems(): ?BoxItems {
		return $this->boxItems;
	}

	public function setBoxItems(?BoxItems $boxItems) {
		$this->boxItems = $boxItems;
	}

	public function withBoxItems(?BoxItems $boxItems): DrawByUserIdResult {
		$this->boxItems = $boxItems;
		return $this;
	}

    public static function fromJson(?array $data): ?DrawByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new DrawByUserIdResult())
            ->withItems(array_map(
                function ($item) {
                    return DrawnPrize::fromJson($item);
                },
                array_key_exists('items', $data) && $data['items'] !== null ? $data['items'] : []
            ))
            ->withStampSheet(empty($data['stampSheet']) ? null : $data['stampSheet'])
            ->withStampSheetEncryptionKeyId(empty($data['stampSheetEncryptionKeyId']) ? null : $data['stampSheetEncryptionKeyId'])
            ->withBoxItems(empty($data['boxItems']) ? null : BoxItems::fromJson($data['boxItems']));
    }

    public function toJson(): array {
        return array(
            "items" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems() !== null && $this->getItems() !== null ? $this->getItems() : []
            ),
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
            "boxItems" => $this->getBoxItems() !== null ? $this->getBoxItems()->toJson() : null,
        );
    }
}