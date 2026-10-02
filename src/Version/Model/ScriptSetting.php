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
 * Script Setting
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#scriptsetting
 */
class ScriptSetting implements IModel {
	/**
     * @var string GS2-Script script GRN executed synchronously when the API is executed
	 */
	private $triggerScriptId;
	/**
     * @var string Asynchronous script execution method
	 */
	private $doneTriggerTargetType;
	/**
     * @var string GS2-Script script GRN for asynchronous execution
	 */
	private $doneTriggerScriptId;
	/**
     * @var string GS2-JobQueue Namespace GRN used to execute asynchronous scripts
	 */
	private $doneTriggerQueueNamespaceId;
    /** @return string|null GS2-Script script GRN executed synchronously when the API is executed */
	public function getTriggerScriptId(): ?string {
		return $this->triggerScriptId;
	}
    /** @param string|null $triggerScriptId GS2-Script script GRN executed synchronously when the API is executed */
	public function setTriggerScriptId(?string $triggerScriptId) {
		$this->triggerScriptId = $triggerScriptId;
	}
    /**
     * @param string|null $triggerScriptId GS2-Script script GRN executed synchronously when the API is executed
     * @return ScriptSetting
     */
	public function withTriggerScriptId(?string $triggerScriptId): ScriptSetting {
		$this->triggerScriptId = $triggerScriptId;
		return $this;
	}
    /** @return string|null Asynchronous script execution method */
	public function getDoneTriggerTargetType(): ?string {
		return $this->doneTriggerTargetType;
	}
    /** @param string|null $doneTriggerTargetType Asynchronous script execution method */
	public function setDoneTriggerTargetType(?string $doneTriggerTargetType) {
		$this->doneTriggerTargetType = $doneTriggerTargetType;
	}
    /**
     * @param string|null $doneTriggerTargetType Asynchronous script execution method
     * @return ScriptSetting
     */
	public function withDoneTriggerTargetType(?string $doneTriggerTargetType): ScriptSetting {
		$this->doneTriggerTargetType = $doneTriggerTargetType;
		return $this;
	}
    /** @return string|null GS2-Script script GRN for asynchronous execution */
	public function getDoneTriggerScriptId(): ?string {
		return $this->doneTriggerScriptId;
	}
    /** @param string|null $doneTriggerScriptId GS2-Script script GRN for asynchronous execution */
	public function setDoneTriggerScriptId(?string $doneTriggerScriptId) {
		$this->doneTriggerScriptId = $doneTriggerScriptId;
	}
    /**
     * @param string|null $doneTriggerScriptId GS2-Script script GRN for asynchronous execution
     * @return ScriptSetting
     */
	public function withDoneTriggerScriptId(?string $doneTriggerScriptId): ScriptSetting {
		$this->doneTriggerScriptId = $doneTriggerScriptId;
		return $this;
	}
    /** @return string|null GS2-JobQueue Namespace GRN used to execute asynchronous scripts */
	public function getDoneTriggerQueueNamespaceId(): ?string {
		return $this->doneTriggerQueueNamespaceId;
	}
    /** @param string|null $doneTriggerQueueNamespaceId GS2-JobQueue Namespace GRN used to execute asynchronous scripts */
	public function setDoneTriggerQueueNamespaceId(?string $doneTriggerQueueNamespaceId) {
		$this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
	}
    /**
     * @param string|null $doneTriggerQueueNamespaceId GS2-JobQueue Namespace GRN used to execute asynchronous scripts
     * @return ScriptSetting
     */
	public function withDoneTriggerQueueNamespaceId(?string $doneTriggerQueueNamespaceId): ScriptSetting {
		$this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?ScriptSetting {
        if ($data === null) {
            return null;
        }
        return (new ScriptSetting())
            ->withTriggerScriptId(array_key_exists('triggerScriptId', $data) && $data['triggerScriptId'] !== null ? $data['triggerScriptId'] : null)
            ->withDoneTriggerTargetType(array_key_exists('doneTriggerTargetType', $data) && $data['doneTriggerTargetType'] !== null ? $data['doneTriggerTargetType'] : null)
            ->withDoneTriggerScriptId(array_key_exists('doneTriggerScriptId', $data) && $data['doneTriggerScriptId'] !== null ? $data['doneTriggerScriptId'] : null)
            ->withDoneTriggerQueueNamespaceId(array_key_exists('doneTriggerQueueNamespaceId', $data) && $data['doneTriggerQueueNamespaceId'] !== null ? $data['doneTriggerQueueNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "triggerScriptId" => $this->getTriggerScriptId(),
            "doneTriggerTargetType" => $this->getDoneTriggerTargetType(),
            "doneTriggerScriptId" => $this->getDoneTriggerScriptId(),
            "doneTriggerQueueNamespaceId" => $this->getDoneTriggerQueueNamespaceId(),
        );
    }
}