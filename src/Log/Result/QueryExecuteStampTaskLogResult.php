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

namespace Gs2\Log\Result;

use Gs2\Core\Model\IResult;
use Gs2\Log\Model\ExecuteStampTaskLog;

/**
 * スタンプタスク実行ログの一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class QueryExecuteStampTaskLogResult implements IResult {
	/** @var ExecuteStampTaskLog[] スタンプタスク実行ログのリスト */
	private $items;
	/** @var string リストの続きを取得するためのページトークン */
	private $nextPageToken;
	/** @var int クエリ結果の総件数 */
	private $totalCount;
	/** @var int 検索時にスキャンした総容量 */
	private $scanSize;

	/**
	 * スタンプタスク実行ログのリストを取得
	 *
	 * @return ExecuteStampTaskLog[]|null スタンプタスク実行ログの一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * スタンプタスク実行ログのリストを設定
	 *
	 * @param ExecuteStampTaskLog[]|null $items スタンプタスク実行ログの一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * リストの続きを取得するためのページトークンを取得
	 *
	 * @return string|null スタンプタスク実行ログの一覧を取得
	 */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	/**
	 * リストの続きを取得するためのページトークンを設定
	 *
	 * @param string|null $nextPageToken スタンプタスク実行ログの一覧を取得
	 */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

	/**
	 * クエリ結果の総件数を取得
	 *
	 * @return int|null スタンプタスク実行ログの一覧を取得
	 */
	public function getTotalCount(): ?int {
		return $this->totalCount;
	}

	/**
	 * クエリ結果の総件数を設定
	 *
	 * @param int|null $totalCount スタンプタスク実行ログの一覧を取得
	 */
	public function setTotalCount(?int $totalCount) {
		$this->totalCount = $totalCount;
	}

	/**
	 * 検索時にスキャンした総容量を取得
	 *
	 * @return int|null スタンプタスク実行ログの一覧を取得
	 */
	public function getScanSize(): ?int {
		return $this->scanSize;
	}

	/**
	 * 検索時にスキャンした総容量を設定
	 *
	 * @param int|null $scanSize スタンプタスク実行ログの一覧を取得
	 */
	public function setScanSize(?int $scanSize) {
		$this->scanSize = $scanSize;
	}

    public static function fromJson(array $data): QueryExecuteStampTaskLogResult {
        $result = new QueryExecuteStampTaskLogResult();
        $result->setItems(array_map(
                function ($v) {
                    return ExecuteStampTaskLog::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setNextPageToken(isset($data["nextPageToken"]) ? $data["nextPageToken"] : null);
        $result->setTotalCount(isset($data["totalCount"]) ? $data["totalCount"] : null);
        $result->setScanSize(isset($data["scanSize"]) ? $data["scanSize"] : null);
        return $result;
    }
}