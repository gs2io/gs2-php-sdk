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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inventory\Model\ScriptSetting;
use Gs2\Inventory\Model\LogSetting;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $name;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var ScriptSetting アイテム入手したときに実行するスクリプト */
    private $acquireScript;

    /**
     * アイテム入手したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getAcquireScript(): ?ScriptSetting {
        return $this->acquireScript;
    }

    /**
     * アイテム入手したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $acquireScript ネームスペースを新規作成
     */
    public function setAcquireScript(ScriptSetting $acquireScript) {
        $this->acquireScript = $acquireScript;
    }

    /**
     * アイテム入手したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $acquireScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withAcquireScript(ScriptSetting $acquireScript): CreateNamespaceRequest {
        $this->setAcquireScript($acquireScript);
        return $this;
    }

    /** @var ScriptSetting 入手上限に当たって入手できなかったときに実行するスクリプト */
    private $overflowScript;

    /**
     * 入手上限に当たって入手できなかったときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getOverflowScript(): ?ScriptSetting {
        return $this->overflowScript;
    }

    /**
     * 入手上限に当たって入手できなかったときに実行するスクリプトを設定
     *
     * @param ScriptSetting $overflowScript ネームスペースを新規作成
     */
    public function setOverflowScript(ScriptSetting $overflowScript) {
        $this->overflowScript = $overflowScript;
    }

    /**
     * 入手上限に当たって入手できなかったときに実行するスクリプトを設定
     *
     * @param ScriptSetting $overflowScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withOverflowScript(ScriptSetting $overflowScript): CreateNamespaceRequest {
        $this->setOverflowScript($overflowScript);
        return $this;
    }

    /** @var ScriptSetting アイテム消費するときに実行するスクリプト */
    private $consumeScript;

    /**
     * アイテム消費するときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getConsumeScript(): ?ScriptSetting {
        return $this->consumeScript;
    }

    /**
     * アイテム消費するときに実行するスクリプトを設定
     *
     * @param ScriptSetting $consumeScript ネームスペースを新規作成
     */
    public function setConsumeScript(ScriptSetting $consumeScript) {
        $this->consumeScript = $consumeScript;
    }

    /**
     * アイテム消費するときに実行するスクリプトを設定
     *
     * @param ScriptSetting $consumeScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withConsumeScript(ScriptSetting $consumeScript): CreateNamespaceRequest {
        $this->setConsumeScript($consumeScript);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     */
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}