<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\InGamePushNotification\Model;

/**
 * MQTTサーバ
 *
 * @author Game Server Services, Inc.
 *
 */
class MqttHost {

	/** @var string ゲームGRN */
	private $gameId;

	/** @var string ホスト名 */
	private $host;

	/** @var int 待受ポート */
	private $port;

	/** @var string ルート証明書 */
	private $rootCertificate;

	/**
	 * ゲームGRNを取得
	 *
	 * @return string ゲームGRN
	 */
	public function getGameId() {
		return $this->gameId;
	}

	/**
	 * ゲームGRNを設定
	 *
	 * @param string $gameId ゲームGRN
	 */
	public function setGameId($gameId) {
		$this->gameId = $gameId;
	}

	/**
	 * ゲームGRNを設定
	 *
	 * @param string $gameId ゲームGRN
	 * @return self
	 */
	public function withGameId($gameId): self {
		$this->setGameId($gameId);
		return $this;
	}

	/**
	 * ホスト名を取得
	 *
	 * @return string ホスト名
	 */
	public function getHost() {
		return $this->host;
	}

	/**
	 * ホスト名を設定
	 *
	 * @param string $host ホスト名
	 */
	public function setHost($host) {
		$this->host = $host;
	}

	/**
	 * ホスト名を設定
	 *
	 * @param string $host ホスト名
	 * @return self
	 */
	public function withHost($host): self {
		$this->setHost($host);
		return $this;
	}

	/**
	 * 待受ポートを取得
	 *
	 * @return int 待受ポート
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * 待受ポートを設定
	 *
	 * @param int $port 待受ポート
	 */
	public function setPort($port) {
		$this->port = $port;
	}

	/**
	 * 待受ポートを設定
	 *
	 * @param int $port 待受ポート
	 * @return self
	 */
	public function withPort($port): self {
		$this->setPort($port);
		return $this;
	}

	/**
	 * ルート証明書を取得
	 *
	 * @return string ルート証明書
	 */
	public function getRootCertificate() {
		return $this->rootCertificate;
	}

	/**
	 * ルート証明書を設定
	 *
	 * @param string $rootCertificate ルート証明書
	 */
	public function setRootCertificate($rootCertificate) {
		$this->rootCertificate = $rootCertificate;
	}

	/**
	 * ルート証明書を設定
	 *
	 * @param string $rootCertificate ルート証明書
	 * @return self
	 */
	public function withRootCertificate($rootCertificate): self {
		$this->setRootCertificate($rootCertificate);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return MqttHost
	 */
    static function build(array $array)
    {
        $item = new MqttHost();
        $item->setGameId(isset($array['gameId']) ? $array['gameId'] : null);
        $item->setHost(isset($array['host']) ? $array['host'] : null);
        $item->setPort(isset($array['port']) ? $array['port'] : null);
        $item->setRootCertificate(isset($array['rootCertificate']) ? $array['rootCertificate'] : null);
        return $item;
    }

}