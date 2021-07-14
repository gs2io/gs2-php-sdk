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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteMessageRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $messageName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteMessageRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): DeleteMessageRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getMessageName(): ?string {
		return $this->messageName;
	}

	public function setMessageName(?string $messageName) {
		$this->messageName = $messageName;
	}

	public function withMessageName(?string $messageName): DeleteMessageRequest {
		$this->messageName = $messageName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteMessageRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteMessageRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRoomName(empty($data['roomName']) ? null : $data['roomName'])
            ->withMessageName(empty($data['messageName']) ? null : $data['messageName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "messageName" => $this->getMessageName(),
        );
    }
}