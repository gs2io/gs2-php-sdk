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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Experience\Model\ScriptSetting;
use Gs2\Experience\Model\LogSetting;

/**
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ランクキャップ取得時 に実行されるスクリプト のGRN */
    private $experienceCapScriptId;

    /**
     * ランクキャップ取得時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getExperienceCapScriptId(): ?string {
        return $this->experienceCapScriptId;
    }

    /**
     * ランクキャップ取得時 に実行されるスクリプト のGRNを設定
     *
     * @param string $experienceCapScriptId ネームスペースを更新
     */
    public function setExperienceCapScriptId(string $experienceCapScriptId) {
        $this->experienceCapScriptId = $experienceCapScriptId;
    }

    /**
     * ランクキャップ取得時 に実行されるスクリプト のGRNを設定
     *
     * @param string $experienceCapScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withExperienceCapScriptId(string $experienceCapScriptId): UpdateNamespaceRequest {
        $this->setExperienceCapScriptId($experienceCapScriptId);
        return $this;
    }

    /** @var ScriptSetting 経験値変化したときに実行するスクリプト */
    private $changeExperienceScript;

    /**
     * 経験値変化したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getChangeExperienceScript(): ?ScriptSetting {
        return $this->changeExperienceScript;
    }

    /**
     * 経験値変化したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $changeExperienceScript ネームスペースを更新
     */
    public function setChangeExperienceScript(ScriptSetting $changeExperienceScript) {
        $this->changeExperienceScript = $changeExperienceScript;
    }

    /**
     * 経験値変化したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $changeExperienceScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withChangeExperienceScript(ScriptSetting $changeExperienceScript): UpdateNamespaceRequest {
        $this->setChangeExperienceScript($changeExperienceScript);
        return $this;
    }

    /** @var ScriptSetting ランク変化したときに実行するスクリプト */
    private $changeRankScript;

    /**
     * ランク変化したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getChangeRankScript(): ?ScriptSetting {
        return $this->changeRankScript;
    }

    /**
     * ランク変化したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $changeRankScript ネームスペースを更新
     */
    public function setChangeRankScript(ScriptSetting $changeRankScript) {
        $this->changeRankScript = $changeRankScript;
    }

    /**
     * ランク変化したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $changeRankScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withChangeRankScript(ScriptSetting $changeRankScript): UpdateNamespaceRequest {
        $this->setChangeRankScript($changeRankScript);
        return $this;
    }

    /** @var ScriptSetting ランクキャップ変化したときに実行するスクリプト */
    private $changeRankCapScript;

    /**
     * ランクキャップ変化したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getChangeRankCapScript(): ?ScriptSetting {
        return $this->changeRankCapScript;
    }

    /**
     * ランクキャップ変化したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $changeRankCapScript ネームスペースを更新
     */
    public function setChangeRankCapScript(ScriptSetting $changeRankCapScript) {
        $this->changeRankCapScript = $changeRankCapScript;
    }

    /**
     * ランクキャップ変化したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $changeRankCapScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withChangeRankCapScript(ScriptSetting $changeRankCapScript): UpdateNamespaceRequest {
        $this->setChangeRankCapScript($changeRankCapScript);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     */
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}