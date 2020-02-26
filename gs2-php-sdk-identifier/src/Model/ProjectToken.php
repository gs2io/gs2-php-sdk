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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;

/**
 * プロジェクトトークン
 *
 * @author Game Server Services, Inc.
 *
 */
class ProjectToken implements IModel {
	/**
     * @var string プロジェクトトークン
	 */
	protected $token;

	/**
	 * プロジェクトトークンを取得
	 *
	 * @return string|null プロジェクトトークン
	 */
	public function getToken(): ?string {
		return $this->token;
	}

	/**
	 * プロジェクトトークンを設定
	 *
	 * @param string|null $token プロジェクトトークン
	 */
	public function setToken(?string $token) {
		$this->token = $token;
	}

	/**
	 * プロジェクトトークンを設定
	 *
	 * @param string|null $token プロジェクトトークン
	 * @return ProjectToken $this
	 */
	public function withToken(?string $token): ProjectToken {
		$this->token = $token;
		return $this;
	}

    public function toJson(): array {
        return array(
            "token" => $this->token,
        );
    }

    public static function fromJson(array $data): ProjectToken {
        $model = new ProjectToken();
        $model->setToken(isset($data["token"]) ? $data["token"] : null);
        return $model;
    }
}