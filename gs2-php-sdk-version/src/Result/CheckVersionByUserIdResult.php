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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\Status;

/**
 * バージョンチェック のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CheckVersionByUserIdResult implements IResult {
	/** @var string プロジェクトトークン */
	private $projectToken;
	/** @var Status[] バージョンの検証結果のリスト */
	private $warnings;
	/** @var Status[] バージョンの検証結果のリスト */
	private $errors;

	/**
	 * プロジェクトトークンを取得
	 *
	 * @return string|null バージョンチェック
	 */
	public function getProjectToken(): ?string {
		return $this->projectToken;
	}

	/**
	 * プロジェクトトークンを設定
	 *
	 * @param string|null $projectToken バージョンチェック
	 */
	public function setProjectToken(?string $projectToken) {
		$this->projectToken = $projectToken;
	}

	/**
	 * バージョンの検証結果のリストを取得
	 *
	 * @return Status[]|null バージョンチェック
	 */
	public function getWarnings(): ?array {
		return $this->warnings;
	}

	/**
	 * バージョンの検証結果のリストを設定
	 *
	 * @param Status[]|null $warnings バージョンチェック
	 */
	public function setWarnings(?array $warnings) {
		$this->warnings = $warnings;
	}

	/**
	 * バージョンの検証結果のリストを取得
	 *
	 * @return Status[]|null バージョンチェック
	 */
	public function getErrors(): ?array {
		return $this->errors;
	}

	/**
	 * バージョンの検証結果のリストを設定
	 *
	 * @param Status[]|null $errors バージョンチェック
	 */
	public function setErrors(?array $errors) {
		$this->errors = $errors;
	}

    public static function fromJson(array $data): CheckVersionByUserIdResult {
        $result = new CheckVersionByUserIdResult();
        $result->setProjectToken(isset($data["projectToken"]) ? $data["projectToken"] : null);
        $result->setWarnings(array_map(
                function ($v) {
                    return Status::fromJson($v);
                },
                isset($data["warnings"]) ? $data["warnings"] : []
            )
        );
        $result->setErrors(array_map(
                function ($v) {
                    return Status::fromJson($v);
                },
                isset($data["errors"]) ? $data["errors"] : []
            )
        );
        return $result;
    }
}