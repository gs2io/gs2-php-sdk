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

namespace Gs2\Quest\Result;

use Gs2\Core\Model\IResult;
use Gs2\Quest\Model\Progress;

/**
 * ユーザIDを指定してクエスト挑戦を削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteProgressByUserIdResult implements IResult {
	/** @var Progress クエスト挑戦 */
	private $item;

	/**
	 * クエスト挑戦を取得
	 *
	 * @return Progress|null ユーザIDを指定してクエスト挑戦を削除
	 */
	public function getItem(): ?Progress {
		return $this->item;
	}

	/**
	 * クエスト挑戦を設定
	 *
	 * @param Progress|null $item ユーザIDを指定してクエスト挑戦を削除
	 */
	public function setItem(?Progress $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteProgressByUserIdResult {
        $result = new DeleteProgressByUserIdResult();
        $result->setItem(isset($data["item"]) ? Progress::fromJson($data["item"]) : null);
        return $result;
    }
}