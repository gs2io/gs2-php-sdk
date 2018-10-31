<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

/**
 * キューに追加するジョブ
 *
 * @author Game Server Services, Inc.
 *
 */
class PushJob {

	/** @var string スクリプト名 */
	private $scriptName;

	/** @var string 引数 */
	private $args;

	/** @var int 最大リトライ回数 */
	private $maxRetry;

	/**
	 * スクリプト名を取得
	 *
	 * @return string スクリプト名
	 */
	public function getScriptName() {
		return $this->scriptName;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string $scriptName スクリプト名
	 */
	public function setScriptName($scriptName) {
		$this->scriptName = $scriptName;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string $scriptName スクリプト名
	 * @return self
	 */
	public function withScriptName($scriptName): self {
		$this->setScriptName($scriptName);
		return $this;
	}

	/**
	 * 引数を取得
	 *
	 * @return string 引数
	 */
	public function getArgs() {
		return $this->args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string $args 引数
	 */
	public function setArgs($args) {
		$this->args = $args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string $args 引数
	 * @return self
	 */
	public function withArgs($args): self {
		$this->setArgs($args);
		return $this;
	}

	/**
	 * 最大リトライ回数を取得
	 *
	 * @return int 最大リトライ回数
	 */
	public function getMaxRetry() {
		return $this->maxRetry;
	}

	/**
	 * 最大リトライ回数を設定
	 *
	 * @param int $maxRetry 最大リトライ回数
	 */
	public function setMaxRetry($maxRetry) {
		$this->maxRetry = $maxRetry;
	}

	/**
	 * 最大リトライ回数を設定
	 *
	 * @param int $maxRetry 最大リトライ回数
	 * @return self
	 */
	public function withMaxRetry($maxRetry): self {
		$this->setMaxRetry($maxRetry);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return PushJob
	 */
    static function build(array $array)
    {
        $item = new PushJob();
        $item->setScriptName(isset($array['scriptName']) ? $array['scriptName'] : null);
        $item->setArgs(isset($array['args']) ? $array['args'] : null);
        $item->setMaxRetry(isset($array['maxRetry']) ? $array['maxRetry'] : null);
        return $item;
    }

}