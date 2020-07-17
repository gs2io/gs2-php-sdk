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

/**
 * データを暗号化します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class EncryptResult implements IResult {
	/** @var string 暗号化済みデータ */
	private $data;

	/**
	 * 暗号化済みデータを取得
	 *
	 * @return string|null データを暗号化します
	 */
	public function getData(): ?string {
		return $this->data;
	}

	/**
	 * 暗号化済みデータを設定
	 *
	 * @param string|null $data データを暗号化します
	 */
	public function setData(?string $data) {
		$this->data = $data;
	}

    public static function fromJson(array $data): EncryptResult {
        $result = new EncryptResult();
        $result->setData(isset($data["data"]) ? $data["data"] : null);
        return $result;
    }
}