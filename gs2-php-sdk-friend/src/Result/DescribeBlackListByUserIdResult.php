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

namespace Gs2\Friend\Result;

use Gs2\Core\Model\IResult;

/**
 * ユーザーIDを指定してブラックリストを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeBlackListByUserIdResult implements IResult {
	/** @var string[] ブラックリストに登録されたユーザIDリスト */
	private $items;

	/**
	 * ブラックリストに登録されたユーザIDリストを取得
	 *
	 * @return string[]|null ユーザーIDを指定してブラックリストを取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * ブラックリストに登録されたユーザIDリストを設定
	 *
	 * @param string[]|null $items ユーザーIDを指定してブラックリストを取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeBlackListByUserIdResult {
        $result = new DescribeBlackListByUserIdResult();
        $result->setItems(isset($data["items"]) ? $data["items"] : null);
        return $result;
    }
}