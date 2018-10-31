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

namespace Gs2\Account\Model;

/**
 * @author Game Server Services, Inc.
 */
class DescribeGameResult {

	/** @var array ゲーム */
	private $items;

	/** @var string 次のページを読み込むためのトークン */
	private $nextPageToken;


    public function __construct(array $array)
    {

        $this->items = $array['items'];

        $this->nextPageToken = $array['nextPageToken'];

    }


	/**
	 * ゲームを取得
	 *
	 * @return array ゲーム
	 */
	public function getItems(): array {
		return $this->items;
	}

	/**
	 * ゲームを設定
	 *
	 * @param array $items ゲーム
	 */
	public function setItems(array $items) {
		$this->items = $items;
	}

	/**
	 * 次のページを読み込むためのトークンを取得
	 *
	 * @return string 次のページを読み込むためのトークン
	 */
	public function getNextPageToken(): string {
		return $this->nextPageToken;
	}

	/**
	 * 次のページを読み込むためのトークンを設定
	 *
	 * @param string $nextPageToken 次のページを読み込むためのトークン
	 */
	public function setNextPageToken(string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

}