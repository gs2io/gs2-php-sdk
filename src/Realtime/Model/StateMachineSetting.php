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

namespace Gs2\Realtime\Model;

use Gs2\Core\Model\IModel;


/**
 * Server-side state machine setting
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#statemachinesetting
 */
class StateMachineSetting implements IModel {
	/**
     * @var string GS2-StateMachine Namespace GRN that stores the room rules
	 */
	private $namespaceId;
	/**
     * @var int Room rule version
	 */
	private $version;
    /** @return string|null GS2-StateMachine Namespace GRN that stores the room rules */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId GS2-StateMachine Namespace GRN that stores the room rules */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId GS2-StateMachine Namespace GRN that stores the room rules
     * @return StateMachineSetting
     */
	public function withNamespaceId(?string $namespaceId): StateMachineSetting {
		$this->namespaceId = $namespaceId;
		return $this;
	}
    /** @return int|null Room rule version */
	public function getVersion(): ?int {
		return $this->version;
	}
    /** @param int|null $version Room rule version */
	public function setVersion(?int $version) {
		$this->version = $version;
	}
    /**
     * @param int|null $version Room rule version
     * @return StateMachineSetting
     */
	public function withVersion(?int $version): StateMachineSetting {
		$this->version = $version;
		return $this;
	}

    public static function fromJson(?array $data): ?StateMachineSetting {
        if ($data === null) {
            return null;
        }
        return (new StateMachineSetting())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? $data['version'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "version" => $this->getVersion(),
        );
    }
}