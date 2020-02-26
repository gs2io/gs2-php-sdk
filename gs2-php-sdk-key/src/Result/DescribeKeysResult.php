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

namespace Gs2\Key\Result;

use Gs2\Core\Model\IResult;
use Gs2\Key\Model\Key;

/**
 * 暗号鍵の一覧を取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeKeysResult implements IResult {
	/** @var Key[] 暗号鍵のリスト */
	private $items;
	/** @var string リストの続きを取得するためのページトークン */
	private $nextPageToken;

	/**
	 * 暗号鍵のリストを取得
	 *
	 * @return Key[]|null 暗号鍵の一覧を取得します
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 暗号鍵のリストを設定
	 *
	 * @param Key[]|null $items 暗号鍵の一覧を取得します
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * リストの続きを取得するためのページトークンを取得
	 *
	 * @return string|null 暗号鍵の一覧を取得します
	 */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	/**
	 * リストの続きを取得するためのページトークンを設定
	 *
	 * @param string|null $nextPageToken 暗号鍵の一覧を取得します
	 */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

    public static function fromJson(array $data): DescribeKeysResult {
        $result = new DescribeKeysResult();
        $result->setItems(array_map(
                function ($v) {
                    return Key::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setNextPageToken(isset($data["nextPageToken"]) ? $data["nextPageToken"] : null);
        return $result;
    }
}