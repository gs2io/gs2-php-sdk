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
use Gs2\Key\Model\GitHubApiKey;

/**
 * GitHub のAPIキーを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateGitHubApiKeyResult implements IResult {
	/** @var GitHubApiKey 更新したGitHub のAPIキー */
	private $item;

	/**
	 * 更新したGitHub のAPIキーを取得
	 *
	 * @return GitHubApiKey|null GitHub のAPIキーを更新
	 */
	public function getItem(): ?GitHubApiKey {
		return $this->item;
	}

	/**
	 * 更新したGitHub のAPIキーを設定
	 *
	 * @param GitHubApiKey|null $item GitHub のAPIキーを更新
	 */
	public function setItem(?GitHubApiKey $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateGitHubApiKeyResult {
        $result = new UpdateGitHubApiKeyResult();
        $result->setItem(isset($data["item"]) ? GitHubApiKey::fromJson($data["item"]) : null);
        return $result;
    }
}