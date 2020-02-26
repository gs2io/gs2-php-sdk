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

namespace Gs2\Lock\Result;

use Gs2\Core\Model\IResult;
use Gs2\Lock\Model\Mutex;

/**
 * ユーザIDを指定してミューテックスを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class LockByUserIdResult implements IResult {
	/** @var Mutex ミューテックス */
	private $item;

	/**
	 * ミューテックスを取得
	 *
	 * @return Mutex|null ユーザIDを指定してミューテックスを取得
	 */
	public function getItem(): ?Mutex {
		return $this->item;
	}

	/**
	 * ミューテックスを設定
	 *
	 * @param Mutex|null $item ユーザIDを指定してミューテックスを取得
	 */
	public function setItem(?Mutex $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): LockByUserIdResult {
        $result = new LockByUserIdResult();
        $result->setItem(isset($data["item"]) ? Mutex::fromJson($data["item"]) : null);
        return $result;
    }
}