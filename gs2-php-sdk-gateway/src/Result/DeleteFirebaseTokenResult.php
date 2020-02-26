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

namespace Gs2\Gateway\Result;

use Gs2\Core\Model\IResult;
use Gs2\Gateway\Model\FirebaseToken;

/**
 * Firebaseデバイストークンを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteFirebaseTokenResult implements IResult {
	/** @var FirebaseToken 削除したFirebaseデバイストークン */
	private $item;

	/**
	 * 削除したFirebaseデバイストークンを取得
	 *
	 * @return FirebaseToken|null Firebaseデバイストークンを削除
	 */
	public function getItem(): ?FirebaseToken {
		return $this->item;
	}

	/**
	 * 削除したFirebaseデバイストークンを設定
	 *
	 * @param FirebaseToken|null $item Firebaseデバイストークンを削除
	 */
	public function setItem(?FirebaseToken $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteFirebaseTokenResult {
        $result = new DeleteFirebaseTokenResult();
        $result->setItem(isset($data["item"]) ? FirebaseToken::fromJson($data["item"]) : null);
        return $result;
    }
}