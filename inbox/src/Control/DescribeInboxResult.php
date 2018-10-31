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

namespace Gs2\Inbox\Control;
use Gs2\Inbox\Model\Inbox;

/**
 * @author Game Server Services, Inc.
 */
class DescribeInboxResult {

	/** @var Inbox[] 受信ボックス */
	private $items;

	/** @var string 次のページを読み込むためのトークン */
	private $nextPageToken;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = [];
            foreach($array['items'] as $arr)
            {
                array_push($this->items, Inbox::build($arr));
            }
        }
        if(isset($array['nextPageToken'])) {
            $this->nextPageToken = $array['nextPageToken'];
        }
    }

	/**
	 * 受信ボックスを取得
	 *
	 * @return Inbox[] 受信ボックス
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * 受信ボックスを設定
	 *
	 * @param Inbox[] $items 受信ボックス
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
}