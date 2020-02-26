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

namespace Gs2\Project\Result;

use Gs2\Core\Model\IResult;

/**
 * パスワードを再発行 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class IssuePasswordResult implements IResult {
	/** @var string 新しいパスワード */
	private $newPassword;

	/**
	 * 新しいパスワードを取得
	 *
	 * @return string|null パスワードを再発行
	 */
	public function getNewPassword(): ?string {
		return $this->newPassword;
	}

	/**
	 * 新しいパスワードを設定
	 *
	 * @param string|null $newPassword パスワードを再発行
	 */
	public function setNewPassword(?string $newPassword) {
		$this->newPassword = $newPassword;
	}

    public static function fromJson(array $data): IssuePasswordResult {
        $result = new IssuePasswordResult();
        $result->setNewPassword(isset($data["newPassword"]) ? $data["newPassword"] : null);
        return $result;
    }
}