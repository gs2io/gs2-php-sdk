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

namespace Gs2\JobQueue\Model;

use Gs2\Core\Model\IModel;

/**
 * ジョブ
 *
 * @author Game Server Services, Inc.
 *
 */
class JobEntry implements IModel {
	/**
     * @var string スクリプト のGRN
	 */
	protected $scriptId;

	/**
	 * スクリプト のGRNを取得
	 *
	 * @return string|null スクリプト のGRN
	 */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	/**
	 * スクリプト のGRNを設定
	 *
	 * @param string|null $scriptId スクリプト のGRN
	 */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	/**
	 * スクリプト のGRNを設定
	 *
	 * @param string|null $scriptId スクリプト のGRN
	 * @return JobEntry $this
	 */
	public function withScriptId(?string $scriptId): JobEntry {
		$this->scriptId = $scriptId;
		return $this;
	}
	/**
     * @var string 引数
	 */
	protected $args;

	/**
	 * 引数を取得
	 *
	 * @return string|null 引数
	 */
	public function getArgs(): ?string {
		return $this->args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 */
	public function setArgs(?string $args) {
		$this->args = $args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string|null $args 引数
	 * @return JobEntry $this
	 */
	public function withArgs(?string $args): JobEntry {
		$this->args = $args;
		return $this;
	}
	/**
     * @var int 最大試行回数
	 */
	protected $maxTryCount;

	/**
	 * 最大試行回数を取得
	 *
	 * @return int|null 最大試行回数
	 */
	public function getMaxTryCount(): ?int {
		return $this->maxTryCount;
	}

	/**
	 * 最大試行回数を設定
	 *
	 * @param int|null $maxTryCount 最大試行回数
	 */
	public function setMaxTryCount(?int $maxTryCount) {
		$this->maxTryCount = $maxTryCount;
	}

	/**
	 * 最大試行回数を設定
	 *
	 * @param int|null $maxTryCount 最大試行回数
	 * @return JobEntry $this
	 */
	public function withMaxTryCount(?int $maxTryCount): JobEntry {
		$this->maxTryCount = $maxTryCount;
		return $this;
	}

    public function toJson(): array {
        return array(
            "scriptId" => $this->scriptId,
            "args" => $this->args,
            "maxTryCount" => $this->maxTryCount,
        );
    }

    public static function fromJson(array $data): JobEntry {
        $model = new JobEntry();
        $model->setScriptId(isset($data["scriptId"]) ? $data["scriptId"] : null);
        $model->setArgs(isset($data["args"]) ? $data["args"] : null);
        $model->setMaxTryCount(isset($data["maxTryCount"]) ? $data["maxTryCount"] : null);
        return $model;
    }
}