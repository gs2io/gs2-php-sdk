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
 * ボックスから取り出したアイテムのリスト
 *
 * @author Game Server Services, Inc.
 *
 */
class BoxItems implements IModel {
	/**
     * @var string ボックス
	 */
	protected $boxId;

	/**
	 * ボックスを取得
	 *
	 * @return string|null ボックス
	 */
	public function getBoxId(): ?string {
		return $this->boxId;
	}

	/**
	 * ボックスを設定
	 *
	 * @param string|null $boxId ボックス
	 */
	public function setBoxId(?string $boxId) {
		$this->boxId = $boxId;
	}

	/**
	 * ボックスを設定
	 *
	 * @param string|null $boxId ボックス
	 * @return BoxItems $this
	 */
	public function withBoxId(?string $boxId): BoxItems {
		$this->boxId = $boxId;
		return $this;
	}
	/**
     * @var string 排出確率テーブル名
	 */
	protected $prizeTableName;

	/**
	 * 排出確率テーブル名を取得
	 *
	 * @return string|null 排出確率テーブル名
	 */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string|null $prizeTableName 排出確率テーブル名
	 */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}

	/**
	 * 排出確率テーブル名を設定
	 *
	 * @param string|null $prizeTableName 排出確率テーブル名
	 * @return BoxItems $this
	 */
	public function withPrizeTableName(?string $prizeTableName): BoxItems {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return BoxItems $this
	 */
	public function withUserId(?string $userId): BoxItems {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var BoxItem[] ボックスから取り出したアイテムのリスト
	 */
	protected $items;

	/**
	 * ボックスから取り出したアイテムのリストを取得
	 *
	 * @return BoxItem[]|null ボックスから取り出したアイテムのリスト
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * ボックスから取り出したアイテムのリストを設定
	 *
	 * @param BoxItem[]|null $items ボックスから取り出したアイテムのリスト
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * ボックスから取り出したアイテムのリストを設定
	 *
	 * @param BoxItem[]|null $items ボックスから取り出したアイテムのリスト
	 * @return BoxItems $this
	 */
	public function withItems(?array $items): BoxItems {
		$this->items = $items;
		return $this;
	}

    public function toJson(): array {
        return array(
            "boxId" => $this->boxId,
            "prizeTableName" => $this->prizeTableName,
            "userId" => $this->userId,
            "items" => array_map(
                function (BoxItem $v) {
                    return $v->toJson();
                },
                $this->items == null ? [] : $this->items
            ),
        );
    }

    public static function fromJson(array $data): BoxItems {
        $model = new BoxItems();
        $model->setBoxId(isset($data["boxId"]) ? $data["boxId"] : null);
        $model->setPrizeTableName(isset($data["prizeTableName"]) ? $data["prizeTableName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setItems(array_map(
                function ($v) {
                    return BoxItem::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $model;
    }
}