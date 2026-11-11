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
 * Participant setting
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#participantsetting
 */
class ParticipantSetting implements IModel {
	/**
     * @var string GS2-Identifier user GRN the room acts as
	 */
	private $userId;
	/**
     * @var string GS2-Script GRN that makes a participant's data
	 */
	private $scriptId;
    /** @return string|null GS2-Identifier user GRN the room acts as */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId GS2-Identifier user GRN the room acts as */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId GS2-Identifier user GRN the room acts as
     * @return ParticipantSetting
     */
	public function withUserId(?string $userId): ParticipantSetting {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null GS2-Script GRN that makes a participant's data */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
    /** @param string|null $scriptId GS2-Script GRN that makes a participant's data */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
    /**
     * @param string|null $scriptId GS2-Script GRN that makes a participant's data
     * @return ParticipantSetting
     */
	public function withScriptId(?string $scriptId): ParticipantSetting {
		$this->scriptId = $scriptId;
		return $this;
	}

    public static function fromJson(?array $data): ?ParticipantSetting {
        if ($data === null) {
            return null;
        }
        return (new ParticipantSetting())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "scriptId" => $this->getScriptId(),
        );
    }
}