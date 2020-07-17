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

namespace Gs2\News\Result;

use Gs2\Core\Model\IResult;

/**
 * 現在有効なお知らせを更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareUpdateCurrentNewsMasterFromGitHubResult implements IResult {
	/** @var string アップロード後に結果を反映する際に使用するトークン */
	private $uploadToken;

	/**
	 * アップロード後に結果を反映する際に使用するトークンを取得
	 *
	 * @return string|null 現在有効なお知らせを更新します
	 */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}

	/**
	 * アップロード後に結果を反映する際に使用するトークンを設定
	 *
	 * @param string|null $uploadToken 現在有効なお知らせを更新します
	 */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}

    public static function fromJson(array $data): PrepareUpdateCurrentNewsMasterFromGitHubResult {
        $result = new PrepareUpdateCurrentNewsMasterFromGitHubResult();
        $result->setUploadToken(isset($data["uploadToken"]) ? $data["uploadToken"] : null);
        return $result;
    }
}