<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Chat\Control;
use Gs2\Chat\Model\MessageLog;

/**
 * @author Game Server Services, Inc.
 */
class SearchLogByAllRoomResult {

	/** @var MessageLog[] メッセージログ */
	private $items;

	/** @var string 次のページを読み込むためのトークン */
	private $nextPageToken;

	/** @var long 検索時にスキャンしたログデータサイズ */
	private $scanSize;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = [];
            foreach($array['items'] as $arr)
            {
                array_push($this->items, MessageLog::build($arr));
            }
        }
        if(isset($array['nextPageToken'])) {
            $this->nextPageToken = $array['nextPageToken'];
        }
        if(isset($array['scanSize'])) {
            $this->scanSize = $array['scanSize'];
        }
    }

	/**
	 * メッセージログを取得
	 *
	 * @return MessageLog[] メッセージログ
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * メッセージログを設定
	 *
	 * @param MessageLog[] $items メッセージログ
	 */
	public function setItems($items) {
		$this->items = $items;
	}

	/**
	 * 次のページを読み込むためのトークンを取得
	 *
	 * @return string 次のページを読み込むためのトークン
	 */
	public function getNextPageToken() {
		return $this->nextPageToken;
	}

	/**
	 * 次のページを読み込むためのトークンを設定
	 *
	 * @param string $nextPageToken 次のページを読み込むためのトークン
	 */
	public function setNextPageToken($nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

	/**
	 * 検索時にスキャンしたログデータサイズを取得
	 *
	 * @return long 検索時にスキャンしたログデータサイズ
	 */
	public function getScanSize() {
		return $this->scanSize;
	}

	/**
	 * 検索時にスキャンしたログデータサイズを設定
	 *
	 * @param long $scanSize 検索時にスキャンしたログデータサイズ
	 */
	public function setScanSize($scanSize) {
		$this->scanSize = $scanSize;
	}
}