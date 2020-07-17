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

namespace Gs2\Schedule\Result;

use Gs2\Core\Model\IResult;
use Gs2\Schedule\Model\Trigger;

/**
 * ユーザIDを指定してトリガーを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteTriggerByUserIdResult implements IResult {
	/** @var Trigger トリガー */
	private $item;

	/**
	 * トリガーを取得
	 *
	 * @return Trigger|null ユーザIDを指定してトリガーを削除
	 */
	public function getItem(): ?Trigger {
		return $this->item;
	}

	/**
	 * トリガーを設定
	 *
	 * @param Trigger|null $item ユーザIDを指定してトリガーを削除
	 */
	public function setItem(?Trigger $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteTriggerByUserIdResult {
        $result = new DeleteTriggerByUserIdResult();
        $result->setItem(isset($data["item"]) ? Trigger::fromJson($data["item"]) : null);
        return $result;
    }
}