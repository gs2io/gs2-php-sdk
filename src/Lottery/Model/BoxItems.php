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
 * Box Items
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#boxitems
 */
class BoxItems implements IModel {
	/**
     * @var string Box GRN
	 */
	private $boxId;
	/**
     * @var string Prize Table name
	 */
	private $prizeTableName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array Items
	 */
	private $items;
    /** @return string|null Box GRN */
	public function getBoxId(): ?string {
		return $this->boxId;
	}
    /** @param string|null $boxId Box GRN */
	public function setBoxId(?string $boxId) {
		$this->boxId = $boxId;
	}
    /**
     * @param string|null $boxId Box GRN
     * @return BoxItems
     */
	public function withBoxId(?string $boxId): BoxItems {
		$this->boxId = $boxId;
		return $this;
	}
    /** @return string|null Prize Table name */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
    /** @param string|null $prizeTableName Prize Table name */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
    /**
     * @param string|null $prizeTableName Prize Table name
     * @return BoxItems
     */
	public function withPrizeTableName(?string $prizeTableName): BoxItems {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return BoxItems
     */
	public function withUserId(?string $userId): BoxItems {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Items */
	public function getItems(): ?array {
		return $this->items;
	}
    /** @param array|null $items Items */
	public function setItems(?array $items) {
		$this->items = $items;
	}
    /**
     * @param array|null $items Items
     * @return BoxItems
     */
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