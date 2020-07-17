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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;

/**
 * スクリプト設定
 *
 * @author Game Server Services, Inc.
 *
 */
class ScriptSetting implements IModel {
	/**
     * @var string 実行前に使用する GS2-Script のスクリプト のGRN
	 */
	protected $triggerScriptId;

	/**
	 * 実行前に使用する GS2-Script のスクリプト のGRNを取得
	 *
	 * @return string|null 実行前に使用する GS2-Script のスクリプト のGRN
	 */
	public function getTriggerScriptId(): ?string {
		return $this->triggerScriptId;
	}

	/**
	 * 実行前に使用する GS2-Script のスクリプト のGRNを設定
	 *
	 * @param string|null $triggerScriptId 実行前に使用する GS2-Script のスクリプト のGRN
	 */
	public function setTriggerScriptId(?string $triggerScriptId) {
		$this->triggerScriptId = $triggerScriptId;
	}

	/**
	 * 実行前に使用する GS2-Script のスクリプト のGRNを設定
	 *
	 * @param string|null $triggerScriptId 実行前に使用する GS2-Script のスクリプト のGRN
	 * @return ScriptSetting $this
	 */
	public function withTriggerScriptId(?string $triggerScriptId): ScriptSetting {
		$this->triggerScriptId = $triggerScriptId;
		return $this;
	}
	/**
     * @var string 完了通知の通知先
	 */
	protected $doneTriggerTargetType;

	/**
	 * 完了通知の通知先を取得
	 *
	 * @return string|null 完了通知の通知先
	 */
	public function getDoneTriggerTargetType(): ?string {
		return $this->doneTriggerTargetType;
	}

	/**
	 * 完了通知の通知先を設定
	 *
	 * @param string|null $doneTriggerTargetType 完了通知の通知先
	 */
	public function setDoneTriggerTargetType(?string $doneTriggerTargetType) {
		$this->doneTriggerTargetType = $doneTriggerTargetType;
	}

	/**
	 * 完了通知の通知先を設定
	 *
	 * @param string|null $doneTriggerTargetType 完了通知の通知先
	 * @return ScriptSetting $this
	 */
	public function withDoneTriggerTargetType(?string $doneTriggerTargetType): ScriptSetting {
		$this->doneTriggerTargetType = $doneTriggerTargetType;
		return $this;
	}
	/**
     * @var string 完了時に使用する GS2-Script のスクリプト のGRN
	 */
	protected $doneTriggerScriptId;

	/**
	 * 完了時に使用する GS2-Script のスクリプト のGRNを取得
	 *
	 * @return string|null 完了時に使用する GS2-Script のスクリプト のGRN
	 */
	public function getDoneTriggerScriptId(): ?string {
		return $this->doneTriggerScriptId;
	}

	/**
	 * 完了時に使用する GS2-Script のスクリプト のGRNを設定
	 *
	 * @param string|null $doneTriggerScriptId 完了時に使用する GS2-Script のスクリプト のGRN
	 */
	public function setDoneTriggerScriptId(?string $doneTriggerScriptId) {
		$this->doneTriggerScriptId = $doneTriggerScriptId;
	}

	/**
	 * 完了時に使用する GS2-Script のスクリプト のGRNを設定
	 *
	 * @param string|null $doneTriggerScriptId 完了時に使用する GS2-Script のスクリプト のGRN
	 * @return ScriptSetting $this
	 */
	public function withDoneTriggerScriptId(?string $doneTriggerScriptId): ScriptSetting {
		$this->doneTriggerScriptId = $doneTriggerScriptId;
		return $this;
	}
	/**
     * @var string 完了時に使用する GS2-JobQueue のネームスペース のGRN
	 */
	protected $doneTriggerQueueNamespaceId;

	/**
	 * 完了時に使用する GS2-JobQueue のネームスペース のGRNを取得
	 *
	 * @return string|null 完了時に使用する GS2-JobQueue のネームスペース のGRN
	 */
	public function getDoneTriggerQueueNamespaceId(): ?string {
		return $this->doneTriggerQueueNamespaceId;
	}

	/**
	 * 完了時に使用する GS2-JobQueue のネームスペース のGRNを設定
	 *
	 * @param string|null $doneTriggerQueueNamespaceId 完了時に使用する GS2-JobQueue のネームスペース のGRN
	 */
	public function setDoneTriggerQueueNamespaceId(?string $doneTriggerQueueNamespaceId) {
		$this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
	}

	/**
	 * 完了時に使用する GS2-JobQueue のネームスペース のGRNを設定
	 *
	 * @param string|null $doneTriggerQueueNamespaceId 完了時に使用する GS2-JobQueue のネームスペース のGRN
	 * @return ScriptSetting $this
	 */
	public function withDoneTriggerQueueNamespaceId(?string $doneTriggerQueueNamespaceId): ScriptSetting {
		$this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "triggerScriptId" => $this->triggerScriptId,
            "doneTriggerTargetType" => $this->doneTriggerTargetType,
            "doneTriggerScriptId" => $this->doneTriggerScriptId,
            "doneTriggerQueueNamespaceId" => $this->doneTriggerQueueNamespaceId,
        );
    }

    public static function fromJson(array $data): ScriptSetting {
        $model = new ScriptSetting();
        $model->setTriggerScriptId(isset($data["triggerScriptId"]) ? $data["triggerScriptId"] : null);
        $model->setDoneTriggerTargetType(isset($data["doneTriggerTargetType"]) ? $data["doneTriggerTargetType"] : null);
        $model->setDoneTriggerScriptId(isset($data["doneTriggerScriptId"]) ? $data["doneTriggerScriptId"] : null);
        $model->setDoneTriggerQueueNamespaceId(isset($data["doneTriggerQueueNamespaceId"]) ? $data["doneTriggerQueueNamespaceId"] : null);
        return $model;
    }
}