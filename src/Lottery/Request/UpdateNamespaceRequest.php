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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Lottery\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
    /** @var string */
    private $lotteryTriggerScriptId;
    /** @var string */
    private $choicePrizeTableScriptId;
    /** @var LogSetting */
    private $logSetting;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}

	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	public function withQueueNamespaceId(?string $queueNamespaceId): UpdateNamespaceRequest {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): UpdateNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getLotteryTriggerScriptId(): ?string {
		return $this->lotteryTriggerScriptId;
	}

	public function setLotteryTriggerScriptId(?string $lotteryTriggerScriptId) {
		$this->lotteryTriggerScriptId = $lotteryTriggerScriptId;
	}

	public function withLotteryTriggerScriptId(?string $lotteryTriggerScriptId): UpdateNamespaceRequest {
		$this->lotteryTriggerScriptId = $lotteryTriggerScriptId;
		return $this;
	}

	public function getChoicePrizeTableScriptId(): ?string {
		return $this->choicePrizeTableScriptId;
	}

	public function setChoicePrizeTableScriptId(?string $choicePrizeTableScriptId) {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
	}

	public function withChoicePrizeTableScriptId(?string $choicePrizeTableScriptId): UpdateNamespaceRequest {
		$this->choicePrizeTableScriptId = $choicePrizeTableScriptId;
		return $this;
	}

	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	public function withLogSetting(?LogSetting $logSetting): UpdateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withQueueNamespaceId(empty($data['queueNamespaceId']) ? null : $data['queueNamespaceId'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId'])
            ->withLotteryTriggerScriptId(empty($data['lotteryTriggerScriptId']) ? null : $data['lotteryTriggerScriptId'])
            ->withChoicePrizeTableScriptId(empty($data['choicePrizeTableScriptId']) ? null : $data['choicePrizeTableScriptId'])
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "lotteryTriggerScriptId" => $this->getLotteryTriggerScriptId(),
            "choicePrizeTableScriptId" => $this->getChoicePrizeTableScriptId(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}