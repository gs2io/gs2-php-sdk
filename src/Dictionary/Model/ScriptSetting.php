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

namespace Gs2\Dictionary\Model;

use Gs2\Core\Model\IModel;


class ScriptSetting implements IModel {
	/**
     * @var string
	 */
	private $triggerScriptId;
	/**
     * @var string
	 */
	private $doneTriggerTargetType;
	/**
     * @var string
	 */
	private $doneTriggerScriptId;
	/**
     * @var string
	 */
	private $doneTriggerQueueNamespaceId;

	public function getTriggerScriptId(): ?string {
		return $this->triggerScriptId;
	}

	public function setTriggerScriptId(?string $triggerScriptId) {
		$this->triggerScriptId = $triggerScriptId;
	}

	public function withTriggerScriptId(?string $triggerScriptId): ScriptSetting {
		$this->triggerScriptId = $triggerScriptId;
		return $this;
	}

	public function getDoneTriggerTargetType(): ?string {
		return $this->doneTriggerTargetType;
	}

	public function setDoneTriggerTargetType(?string $doneTriggerTargetType) {
		$this->doneTriggerTargetType = $doneTriggerTargetType;
	}

	public function withDoneTriggerTargetType(?string $doneTriggerTargetType): ScriptSetting {
		$this->doneTriggerTargetType = $doneTriggerTargetType;
		return $this;
	}

	public function getDoneTriggerScriptId(): ?string {
		return $this->doneTriggerScriptId;
	}

	public function setDoneTriggerScriptId(?string $doneTriggerScriptId) {
		$this->doneTriggerScriptId = $doneTriggerScriptId;
	}

	public function withDoneTriggerScriptId(?string $doneTriggerScriptId): ScriptSetting {
		$this->doneTriggerScriptId = $doneTriggerScriptId;
		return $this;
	}

	public function getDoneTriggerQueueNamespaceId(): ?string {
		return $this->doneTriggerQueueNamespaceId;
	}

	public function setDoneTriggerQueueNamespaceId(?string $doneTriggerQueueNamespaceId) {
		$this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
	}

	public function withDoneTriggerQueueNamespaceId(?string $doneTriggerQueueNamespaceId): ScriptSetting {
		$this->doneTriggerQueueNamespaceId = $doneTriggerQueueNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?ScriptSetting {
        if ($data === null) {
            return null;
        }
        return (new ScriptSetting())
            ->withTriggerScriptId(empty($data['triggerScriptId']) ? null : $data['triggerScriptId'])
            ->withDoneTriggerTargetType(empty($data['doneTriggerTargetType']) ? null : $data['doneTriggerTargetType'])
            ->withDoneTriggerScriptId(empty($data['doneTriggerScriptId']) ? null : $data['doneTriggerScriptId'])
            ->withDoneTriggerQueueNamespaceId(empty($data['doneTriggerQueueNamespaceId']) ? null : $data['doneTriggerQueueNamespaceId']);
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