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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;
use Gs2\Datastore\Model\DataObjectHistory;

/**
 * ユーザIDを指定してデータオブジェクト履歴の一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeDataObjectHistoriesByUserIdResult implements IResult {
	/** @var DataObjectHistory[] データオブジェクト履歴のリスト */
	private $items;
	/** @var string リストの続きを取得するためのページトークン */
	private $nextPageToken;

	/**
	 * データオブジェクト履歴のリストを取得
	 *
	 * @return DataObjectHistory[]|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * データオブジェクト履歴のリストを設定
	 *
	 * @param DataObjectHistory[]|null $items ユーザIDを指定してデータオブジェクト履歴の一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * リストの続きを取得するためのページトークンを取得
	 *
	 * @return string|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
	 */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	/**
	 * リストの続きを取得するためのページトークンを設定
	 *
	 * @param string|null $nextPageToken ユーザIDを指定してデータオブジェクト履歴の一覧を取得
	 */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

    public static function fromJson(array $data): DescribeDataObjectHistoriesByUserIdResult {
        $result = new DescribeDataObjectHistoriesByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return DataObjectHistory::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setNextPageToken(isset($data["nextPageToken"]) ? $data["nextPageToken"] : null);
        return $result;
    }
}