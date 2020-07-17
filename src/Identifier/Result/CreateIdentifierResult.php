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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;
use Gs2\Identifier\Model\Identifier;

/**
 * クレデンシャルを新規作成します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateIdentifierResult implements IResult {
	/** @var Identifier 作成したクレデンシャル */
	private $item;
	/** @var string クライアントシークレット */
	private $clientSecret;

	/**
	 * 作成したクレデンシャルを取得
	 *
	 * @return Identifier|null クレデンシャルを新規作成します
	 */
	public function getItem(): ?Identifier {
		return $this->item;
	}

	/**
	 * 作成したクレデンシャルを設定
	 *
	 * @param Identifier|null $item クレデンシャルを新規作成します
	 */
	public function setItem(?Identifier $item) {
		$this->item = $item;
	}

	/**
	 * クライアントシークレットを取得
	 *
	 * @return string|null クレデンシャルを新規作成します
	 */
	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}

	/**
	 * クライアントシークレットを設定
	 *
	 * @param string|null $clientSecret クレデンシャルを新規作成します
	 */
	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}

    public static function fromJson(array $data): CreateIdentifierResult {
        $result = new CreateIdentifierResult();
        $result->setItem(isset($data["item"]) ? Identifier::fromJson($data["item"]) : null);
        $result->setClientSecret(isset($data["clientSecret"]) ? $data["clientSecret"] : null);
        return $result;
    }
}