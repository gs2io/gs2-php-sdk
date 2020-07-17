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

/**
 * 有効期限ごとのアイテム所持数量の一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeItemSetsByUserIdResult implements IResult {
	/** @var ItemSet[] 有効期限ごとのアイテム所持数量のリスト */
	private $items;
	/** @var string リストの続きを取得するためのページトークン */
	private $nextPageToken;

	/**
	 * 有効期限ごとのアイテム所持数量のリストを取得
	 *
	 * @return ItemSet[]|null 有効期限ごとのアイテム所持数量の一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 有効期限ごとのアイテム所持数量のリストを設定
	 *
	 * @param ItemSet[]|null $items 有効期限ごとのアイテム所持数量の一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * リストの続きを取得するためのページトークンを取得
	 *
	 * @return string|null 有効期限ごとのアイテム所持数量の一覧を取得
	 */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	/**
	 * リストの続きを取得するためのページトークンを設定
	 *
	 * @param string|null $nextPageToken 有効期限ごとのアイテム所持数量の一覧を取得
	 */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

    public static function fromJson(array $data): DescribeItemSetsByUserIdResult {
        $result = new DescribeItemSetsByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return ItemSet::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setNextPageToken(isset($data["nextPageToken"]) ? $data["nextPageToken"] : null);
        return $result;
    }
}