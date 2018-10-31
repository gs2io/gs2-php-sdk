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

namespace Gs2\Script\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateScriptRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateScript";

	/** @var string スクリプトの名前 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string Luaスクリプト */
	private $script;


	/**
	 * スクリプトの名前を取得
	 *
	 * @return string スクリプトの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * スクリプトの名前を設定
	 *
	 * @param string $name スクリプトの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * スクリプトの名前を設定
	 *
	 * @param string $name スクリプトの名前
	 * @return CreateScriptRequest
	 */
	public function withName($name): CreateScriptRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return CreateScriptRequest
	 */
	public function withDescription($description): CreateScriptRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * Luaスクリプトを取得
	 *
	 * @return string Luaスクリプト
	 */
	public function getScript() {
		return $this->script;
	}

	/**
	 * Luaスクリプトを設定
	 *
	 * @param string $script Luaスクリプト
	 */
	public function setScript($script) {
		$this->script = $script;
	}

	/**
	 * Luaスクリプトを設定
	 *
	 * @param string $script Luaスクリプト
	 * @return CreateScriptRequest
	 */
	public function withScript($script): CreateScriptRequest {
		$this->setScript($script);
		return $this;
	}

}