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


class BoxItems implements IModel {
	/**
     * @var string
	 */
	private $boxId;
	/**
     * @var string
	 */
	private $prizeTableName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $items;
	public function getBoxId(): ?string {
		return $this->boxId;
	}
	public function setBoxId(?string $boxId) {
		$this->boxId = $boxId;
	}
	public function withBoxId(?string $boxId): BoxItems {
		$this->boxId = $boxId;
		return $this;
	}
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
	public function withPrizeTableName(?string $prizeTableName): BoxItems {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): BoxItems {
		$this->userId = $userId;
		return $this;
	}
	public function getItems(): ?array {
		return $this->items;
	}
	public function setItems(?array $items) {
		$this->items = $items;
	}
	public function withItems(?array $items): BoxItems {
		$this->items = $items;
		return $this;
	}

    public static function fromJson(?array $data): ?BoxItems {
        if ($data === null) {
            return null;
        }
        return (new BoxItems())
            ->withBoxId(array_key_exists('boxId', $data) && $data['boxId'] !== null ? $data['boxId'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return BoxItem::fromJson($item);
                },
                $data['items']
            ));
    }

    public function toJson(): array {
        return array(
            "boxId" => $this->getBoxId(),
            "prizeTableName" => $this->getPrizeTableName(),
            "userId" => $this->getUserId(),
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
        );
    }
}