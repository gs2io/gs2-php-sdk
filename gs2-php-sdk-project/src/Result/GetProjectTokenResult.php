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
use Gs2\Project\Model\Project;

/**
 * プロジェクトトークンを発行します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetProjectTokenResult implements IResult {
	/** @var Project サインインしたプロジェクト */
	private $item;
	/** @var string オーナーID */
	private $ownerId;
	/** @var string プロジェクトトークン */
	private $projectToken;

	/**
	 * サインインしたプロジェクトを取得
	 *
	 * @return Project|null プロジェクトトークンを発行します
	 */
	public function getItem(): ?Project {
		return $this->item;
	}

	/**
	 * サインインしたプロジェクトを設定
	 *
	 * @param Project|null $item プロジェクトトークンを発行します
	 */
	public function setItem(?Project $item) {
		$this->item = $item;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null プロジェクトトークンを発行します
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId プロジェクトトークンを発行します
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * プロジェクトトークンを取得
	 *
	 * @return string|null プロジェクトトークンを発行します
	 */
	public function getProjectToken(): ?string {
		return $this->projectToken;
	}

	/**
	 * プロジェクトトークンを設定
	 *
	 * @param string|null $projectToken プロジェクトトークンを発行します
	 */
	public function setProjectToken(?string $projectToken) {
		$this->projectToken = $projectToken;
	}

    public static function fromJson(array $data): GetProjectTokenResult {
        $result = new GetProjectTokenResult();
        $result->setItem(isset($data["item"]) ? Project::fromJson($data["item"]) : null);
        $result->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $result->setProjectToken(isset($data["projectToken"]) ? $data["projectToken"] : null);
        return $result;
    }
}