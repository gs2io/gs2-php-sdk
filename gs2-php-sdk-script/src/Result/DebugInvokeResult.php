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

namespace Gs2\Script\Result;

use Gs2\Core\Model\IResult;

/**
 * スクリプトを実行します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DebugInvokeResult implements IResult {
	/** @var int ステータスコード */
	private $code;
	/** @var string 戻り値 */
	private $result;
	/** @var int スクリプトの実行時間(ミリ秒) */
	private $executeTime;
	/** @var int 費用の計算対象となった時間(秒) */
	private $charged;
	/** @var string[] 標準出力の内容のリスト */
	private $output;

	/**
	 * ステータスコードを取得
	 *
	 * @return int|null スクリプトを実行します
	 */
	public function getCode(): ?int {
		return $this->code;
	}

	/**
	 * ステータスコードを設定
	 *
	 * @param int|null $code スクリプトを実行します
	 */
	public function setCode(?int $code) {
		$this->code = $code;
	}

	/**
	 * 戻り値を取得
	 *
	 * @return string|null スクリプトを実行します
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * 戻り値を設定
	 *
	 * @param string|null $result スクリプトを実行します
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

	/**
	 * スクリプトの実行時間(ミリ秒)を取得
	 *
	 * @return int|null スクリプトを実行します
	 */
	public function getExecuteTime(): ?int {
		return $this->executeTime;
	}

	/**
	 * スクリプトの実行時間(ミリ秒)を設定
	 *
	 * @param int|null $executeTime スクリプトを実行します
	 */
	public function setExecuteTime(?int $executeTime) {
		$this->executeTime = $executeTime;
	}

	/**
	 * 費用の計算対象となった時間(秒)を取得
	 *
	 * @return int|null スクリプトを実行します
	 */
	public function getCharged(): ?int {
		return $this->charged;
	}

	/**
	 * 費用の計算対象となった時間(秒)を設定
	 *
	 * @param int|null $charged スクリプトを実行します
	 */
	public function setCharged(?int $charged) {
		$this->charged = $charged;
	}

	/**
	 * 標準出力の内容のリストを取得
	 *
	 * @return string[]|null スクリプトを実行します
	 */
	public function getOutput(): ?array {
		return $this->output;
	}

	/**
	 * 標準出力の内容のリストを設定
	 *
	 * @param string[]|null $output スクリプトを実行します
	 */
	public function setOutput(?array $output) {
		$this->output = $output;
	}

    public static function fromJson(array $data): DebugInvokeResult {
        $result = new DebugInvokeResult();
        $result->setCode(isset($data["code"]) ? $data["code"] : null);
        $result->setResult(isset($data["result"]) ? $data["result"] : null);
        $result->setExecuteTime(isset($data["executeTime"]) ? $data["executeTime"] : null);
        $result->setCharged(isset($data["charged"]) ? $data["charged"] : null);
        $result->setOutput(isset($data["output"]) ? $data["output"] : null);
        return $result;
    }
}